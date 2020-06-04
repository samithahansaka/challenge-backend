**1. Create Author**
----
  Create an author

* **URL**

  /api/v1/authors/create

* **Method:**

  `POST`

* **Data Params**

  **Required:**
   
     `name=[string]`

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** 
    ```
    {
      "data": "Author created successfully !",
      "status": 200,
      "status_string": "success"
    }
    ```
 
* **Error Response:**

  * **Code:** 422 Unprocessable Entity <br />
    **Content:** 
    ```
    {
      "errors": {
          "name": [
              "The name has already been taken."
          ]
      },
      "status": 422,
      "status_string": "fail"
    }
    ```

* **Sample Call:**

  ```
  curl --location --request POST '{{HOST}}/api/v1/authors/create' \
  --header 'Content-Type: application/x-www-form-urlencoded' \
  --data-urlencode 'name=Samitha Hansaka'
  ```
  
**2. Create Article**
----
Create an article

* **URL**

/api/v1/articles/create

* **Method:**

`POST`

* **Data Params**

**Required:**
 
 `author_id=[interger]` <br/>
 `title=[string]` <br/>
 `url=[string]` <br/>
 `content=[string]`

* **Success Response:**

* **Code:** 200 <br />
  **Content:** 
  ```
  {
    "data": "Article created successfully !",
    "status": 200,
    "status_string": "success"
  }
  ```

* **Error Response:**

* **Code:** 422 Unprocessable Entity <br />
  **Content:** 
  ```
  {
      "errors": {
          "url": [
              "The url has already been taken."
          ]
      },
      "status": 422,
      "status_string": "fail"
  }
  ```

* **Sample Call:**

```
curl --location --request POST '{{HOST}}/api/v1/articles/create' \
--header 'Content-Type: application/x-www-form-urlencoded' \
--data-urlencode 'author_id=1' \
--data-urlencode 'title=Reasons sss' \
--data-urlencode 'url=article/3' \
--data-urlencode 'content=Some content...'
```
    
**3. Get article by article id**
----
Get specific article according to given id

* **URL**

/api/v1/articles/{:articleId}

* **Method:**

`GET`

* **Url Params**
    
   `None`

* **Data Params**

`None`

* **Success Response:**

* **Code:** 200 <br />
  **Content:** 
  ```
  {
      "data": {
          "id": 61,
          "author": "Samitha",
          "title": "Done",
          "summary": "Some content...",
          "createdAt": "2020-06-04 14:18:16"
      },
      "status": 200,
      "status_string": "success"
  }
  ```

* **Sample Call:**

```
curl --location --request GET '{{HOST}}/api/v1/articles/61'
```
    
**4. All Articles**
----
Get all articles
  
* **URL**

/api/v1/articles

* **Method:**

`GET`

* **Data Params**

`None`

* **Success Response:**

* **Code:** 200 <br />
  **Content:** 
  ```
  {
      "data": {
          "data": [
              {
                  "id": 61,
                  "author": "Samitha",
                  "title": "Done",
                  "summary": "Some content...",
                  "createdAt": "2020-06-04 14:18:16"
              },
              {
                  "id": 71,
                  "author": "Samitha",
                  "title": "Reasons ssssss",
                  "summary": "Some content...",
                  "createdAt": "2020-06-04 15:58:15"
              }
          ]
      },
      "status": 200,
      "status_string": "success"
  }
  ```

* **Sample Call:**

```
curl --location --request GET '{{HOST}}/api/v1/articles'
```

**5. Delete Article**
  ----
  Delete article
      
  * **URL**
  
    /api/v1/articles/{:articleId}
  
  * **Method:**
  
    `DELETE`
  
  * **Url Params**
            
     `None`
  
  * **Data Params**
  
    `None`
  
  * **Success Response:**
  
    * **Code:** 200 <br />
      **Content:** 
      ```
      {
          "data": "Article deleted successfully !",
          "status": 200,
          "status_string": "success"
      }
      ```
  * **Error Response:**
    
      * **Code:** 422 Unprocessable Entity <br />
        **Content:** 
        ```
        {
            "errors": {
                "id": [
                    "No such article exists"
                ]
            },
            "status": 422,
            "status_string": "fail"
        }
        ```
  
  
  * **Sample Call:**
  
    ```
    curl --location --request DELETE '{{HOST}}/api/v1/articles/61'
    ```    
    
**6. Update Article**
  ----
  Update article
      
  * **URL**
  
    /api/v1/articles/{:articleId}
  
  * **Method:**
  
    `PUT`
  
  * **Url Params**
            
     `None`
  
  * **Data Params**
    
    **One of below params is Required:**
  
    `title=[string]`
    `author_id=[string]`
    `content=[string]`
    `url=[string]`
  
  * **Success Response:**
  
    * **Code:** 200 <br />
      **Content:** 
      ```
      {
          "data": "Article updated successfully !",
          "status": 200,
          "status_string": "success"
      }
      ```
  * **Error Response:**
    
      * **Code:** 422 Unprocessable Entity <br />
        **Content:** 
        ```
        {
            "errors": {
                "articleId": [
                    "Requested article is not exist"
                ]
            },
            "status": 422,
            "status_string": "fail"
        }
        ```
  
  
  * **Sample Call:**
  
    ```
    curl --location --request PUT '{{HOST}}/api/v1/articles/71' \
    --header 'Content-Type: application/x-www-form-urlencoded' \
    --data-urlencode 'title=Done'
    ```    
