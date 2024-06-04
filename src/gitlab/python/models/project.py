################################################################################
#                                                                              #
#                                 project.py                                   #
#                                                                              #
################################################################################
#                                                                              #
#        This is a class for fetching and storing GitLab projects.             #
#                                                                              #
#        Author(s): Abe Megahed                                                #
#                                                                              #
#        This file is subject to the terms and conditions defined in           #
#        'LICENSE.txt', which is part of this source code distribution.        #
#                                                                              #
################################################################################
#  Copyright (C) 2024 Data Science Institute, Univeristy of Wisconsin-Madison  #
################################################################################

from models.gitlab import GitLab
from models.model import Model
import json
import requests
import time
import datetime
from dateutil.parser import parse

class Project(Model):

	#
	# attributes
	#

	base_url = GitLab.url + '/projects'

	#
	# querying methods
	#

	def url(self):

		"""
		Gets the url for this project.

		Returns:
			string
		"""

		return self.base_url + '/' + str(self.get('id')) + '?license=yes&statistics=yes'

	def languages_url(self):

		"""
		Gets the url for this project's languages.

		Returns:
			string
		"""

		return self.base_url + '/' + str(self.get('id')) + '/languages'

	#
	# getting methods
	#

	def get_readme(self):

		"""
		Get the README.md information for this project.

		Returns:
			string
		"""

		# try main branch
		#
		if (self.has('readme_url')):
			request = requests.get(self.get('readme_url'))
			if (request.status_code == 200):
				return request.text

		return None

	#
	# ajax methods
	#

	def fetch(self):

		"""
		Fetches this project from the GitLab API.

		Returns:
			Project
		"""

		# request attributes from API
		#
		request = GitLab().get(self.url())
		if (request.status_code == 200):

			# update attributes
			#
			self.set_all(json.loads(request.text))
		else:
			print("Error - could not fetch model from " + self.url())

		return self

	def fetch_languages(self):

		"""
		Fetches this project from the GitLab API.

		Returns:
			Project
		"""

		# request attributes from API
		#
		languages = None
		request = GitLab().get(self.languages_url())
		if (request.status_code == 200):
			languages = request.text

			# strip json formatting
			#
			languages = languages.replace('{', '').replace('}', '')
			languages = languages.replace('"', '')

			# update attributes
			#
			self.set('languages', languages)
		else:
			print("Error - could not fetch model from " + self.url())

		return languages

	#
	# searching methods
	#

	@staticmethod
	def fetch_by_page(page = None):

		"""
		Fetch projects from the GitLab API.

		Returns:
			array
		"""

		# query GitLab API
		#
		url = Project.base_url;
		if (page != None):
			url += '?per_page=100&page=' + str(page)

		response = GitLab().get(url)

		# parse response
		#
		if (response.status_code == 200):
			return json.loads(response.text)

	@staticmethod
	def fetch_by_id(db, table, id):

		"""
		Fetch and store projects according to a search query.

		Parameters:
			db (object) - The database to store the project info into.
			table (string) - The database table store the project info into.
		Returns:
			None
		"""

		# skip project if it already exists
		#
		project = Project({
			'id': id
		})
		if (project.exists(db, table)):
			return project

		project.fetch()
		project.fetch_languages()

		# delete project if it already exists
		#
		if (project.exists(db, table)):
			project.delete(db, table)

		print("Saving " + project.get('name') if project.has('name') else 'None')
		project.store(db, table)

		return project

	@staticmethod
	def fetch_page(db, table, page = 0, detailed = True):

		"""
		Fetch and store projects according to a search query.

		Parameters:
			db (object) - The database to store the project info into.
			table (string) - The database table store the project info into.
		Returns:
			None
		"""

		print("Fetching page = " + str(page))
		data = Project.fetch_by_page(page)
		
		# check if search returns any results
		#
		if (len(data) == 0):
			return False

		# check total number of projects
		#
		print("Total project count = " + str(len(data)))

		# store data from page
		#
		for i in range(0, len(data)):
			if (detailed):

				# fetch project individually
				#
				project = Project.fetch_by_id(db, table, data[i]['id'])
			else:

				# save project data
				#
				project = Project(data[i])

				# delete project if it already exists
				#
				if (project.exists(db, table)):
					project.delete(db, table)

				print("Saving " + project.get('name'))
				project.store(db, table)

		return True

	@staticmethod
	def fetch_all(db, table):

		"""
		Fetch and store all projects.

		Parameters:
			db (object) - The database to store the project info into.
			table (string) - The database table store the project info into.
		Returns:
			None
		"""

		page = 0
		done = False
		while not done:
			if not Project.fetch_page(db, table, page):
				done = True
			page += 1

	#
	# conversion methods
	#

	def to_array(self):

		"""
		Get this project's attributes as an array.

		Returns:
			array
		"""

		readme = self.get_readme()
		lowercase = readme.lower() if readme else None
		has_images = lowercase != None and ('.jpg' in lowercase or '.jpeg' in lowercase or '.png' in lowercase)
		has_icons = lowercase != None and '.svg' in lowercase

		return {
			'id': self.get('id'),
			'description': self.get('description'),
			'name': self.get('name'),
			'name_with_namespace': self.get('name_with_namespace'),
			'default_branch': self.get('default_branch'),

			# url attributes
			#
			'ssh_url_to_repo': self.get('ssh_url_to_repo'),
			'http_url_to_repo': self.get('http_url_to_repo'),
			'web_url': self.get('web_url'),
			'readme_url': self.get('readme_url'),
			'avatar_url': self.get('avatar_url'),

			# metrics
			#
			'forks_count': self.get('forks_count'),
			'star_count': self.get('star_count'),
			'open_issues_count': self.get('open_issues_count'),

			# statistics
			#
			'commit_count': self.get('statistics')['commit_count'] if self.has('statistics') else None,
			'storage_size': self.get('statistics')['storage_size'] if self.has('statistics') else None,
			'repository_size': self.get('statistics')['repository_size'] if self.has('statistics') else None,
			'languages': self.get('languages') if self.has('languages') else None,

			# namespace
			#
			'namespace_id': self.get('namespace_id'),
			'namespace_name': self.get('namespace_name'),

			# flags
			#
			'empty_repo': 1 if self.get('empty_repo') == 'True' else 0,
			'archived': 1 if self.get('archived') == 'True' else 0,
			'visibility': self.get('visibility'),

			# owner
			#
			'owner_id': self.get('owner_id'),
			'owner_username': self.get('owner_username'),
			'owner_name': self.get('owner_name'),
			'creator_id': self.get('creator_id'),

			# license
			#
			'license_key': self.get('license')['key'] if self.has('license') else None,
			'license_name': self.get('license')['name'] if self.has('license') else None,

			# readme info
			#
			'readme_size': len(readme) if readme else None,
			'readme_has_images': 1 if has_images else 0,
			'readme_has_icons': 1 if has_icons else 0,

			# timestamps
			#
			'created_at': parse(self.get('created_at')).strftime('%Y-%m-%d %H:%M:%S'),
			'updated_at': parse(self.get('updated_at')).strftime('%Y-%m-%d %H:%M:%S'),
			'last_activity_at': parse(self.get('last_activity_at')).strftime('%Y-%m-%d %H:%M:%S')
		}