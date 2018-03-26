# Backend (Laravel)

This challenge is designed to test your familiarity with GIT, Laravel, RESTful APIs, Object-oriented PHP and BASH. You will be required to create an API that can CREATE, READ, UPDATE and DELETE articles using the Laravel Framework. 

While you do not need to include any authentication within the challenge due care should be taken to ensure database inputs are sanitized. 

#### In order to complete this challenge you will need to: 
- The code base needs to run on PHP 7 or higher. 
- All API routes should return JSON and valid HTTP Status Codes. 
- Create a public repository on github to host your codebase (Commit at each milestone) 
- Include setup instructions 
- Include API documentation in a standalone Markdown file 
- Create migrations and entities that will generate the following database tables 
- Good to have a cloud based deployment of your code i.e heroku

```
-- article 
id - integer unique 
author_id - foreign key to author 
title - 255 character limit 
url - Unique 
content - text 
createdAt - datetime 
updatedAt - datetime 

-- author 
id - integer unique 
name - 255 character limit 
```

##### Design a CREATE route for author 
##### Design a CREATE route for article (A valid author_id is required. Return an error IF invalid) 
##### Design a READ route for ALL articles. Return response should be: 

```
[ 
{ 
"id": 1, 
"title": "Anewarticle", 
"author": "JohnSmith", 
"summary": "Some content...", 
"url": "/article/1", 
"createdAt": "2017-03-20" 
}, 
{ 
"id": 2, 
"title": "Anewarticle", 
"author": "JaneSmith", 
"summary": "Some content...", 
"url": "/article/2", 
"createdAt": "2017-03-20" 
} 
]
```

##### Design a READ route for ONE article. Return response should be: 

```
{
 "id": 2, 
"title": "Anewarticle", 
"author": "JaneSmith", 
"content": "All the Content",
 "url": "/article/1", 
"createdAt": "2017-03-20" 
}
```

##### Design an UPDATE route for an article 
##### Design a DELETE route for an article 
##### Create a bash script that will backup the database daily to /opt/backups/database
