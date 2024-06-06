################################################################################
#                                                                              #
#                          fetch_dsi_repositories.py                           #
#                                                                              #
################################################################################
#                                                                              #
#        This is a utility for fetching repositories from the GitHub API       #
#        belonging to the University of Wisconsin Data Science Institute.      #
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
# globals
#

TABLE = 'dsi_repositories'
QUERY = 'org:UW-Madison-DSI'

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

# fetch and store repositories according to search query
#
Repository.find_all(db, TABLE, QUERY)