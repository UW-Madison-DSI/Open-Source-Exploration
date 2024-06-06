################################################################################
#                                                                              #
#                             fetch_repository.py                              #
#                                                                              #
################################################################################
#                                                                              #
#        This is a utility for fetching a repository from the GitHub API.      #
#                                                                              #
#        Author(s): Abe Megahed                                                #
#                                                                              #
#        This file is subject to the terms and conditions defined in           #
#        'LICENSE.txt', which is part of this source code distribution.        #
#                                                                              #
################################################################################
#  Copyright (C) 2024 Data Science Institute, Univeristy of Wisconsin-Madison  #
################################################################################

import mysql.connector
from models.repository import Repository

#
# main
#

# connect to database
#

try:
	db = mysql.connector.connect(
		host = "localhost",
		user = "root",
		password = "root",
		database = "github"
	)
except Exception as e:
	print("Could not connect to database.")
	exit()

# fetch repository
#
repository = Repository({
	'id': 592800946
}).fetch()

# store repository
#
if repository.exists(db, table = "dsi_repositories"):
	repository.delete(db, table = "dsi_repositories")
repository.store(db, table = "dsi_repositories")

# print results
#
repository.print()