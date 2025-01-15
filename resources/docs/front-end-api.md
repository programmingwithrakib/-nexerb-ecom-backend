# Single Vendor E-com front end API Docs

##

### All Categories 

- Method: `GET` 

- URL: `https://ecom.nexerb.xyz/api/categories`

#### Request Example 

```js
const options = {
    method: 'GET',
    url: 'https://ecom.nexerb.xyz/api/categories',
};

axios.request(options).then(function (response) {
    //....
}).catch(function (error) {
    //...
});
```
#### Example Response `200`

```
{
"status": "success",
    "message": "",
    "figure": [
    {
        "id": 1,
        "name": "Winter Collection",
        "slug": "winter-collection",
        "children": [
            {
                "id": 2,
                "name": "All Winter",
                "slug": "all-winter",
                "children": []
            }
            ....,
            ....
        ]
    },
    {
        "id": 6,
        "name": "Mens",
        "slug": "mens",
        "children": [
            {
                "id": 7,
                "name": "tops",
                "slug": "tops",
                "children": [
                    {
                        "id": 8,
                        "name": "Blazers",
                        "slug": "blazers",
                        "children": []
                    },
                    ....,
                    ....
                ]
            },
            ....,
            ....,
        ]
    },
    
]
}
```


### Get Home Sliders

- Method: `GET`

- URL: `https://ecom.nexerb.xyz/api/home-sliders`

#### Request Example

```js
const options = {
    method: 'GET',
    url: 'https://ecom.nexerb.xyz/api/home-sliders',
};

axios.request(options).then(function (response) {
    //....
}).catch(function (error) {
    //...
});
```

#### Example Response `200`

```
{
"status": "success",
"message": "",
"figure": [
        {
          "banner_title": "Id sed qui dolorem est.",
          "banner_desc": "Magnam facilis voluptatem illo sit dolorem. Magnam voluptatum mollitia veritatis tempore quae reprehenderit. Molestiae officiis voluptatem et vel molestias.",
          "banner_video": null,
          "banner_image_sm": "https://via.placeholder.com/500x250.png/0044cc?text=voluptatibus",
          "banner_image_md": "https://via.placeholder.com/700x400.png/003355?text=delectus",
          "banner_image_lg": "https://via.placeholder.com/1266x500.png/00cc44?text=qui",
          "link_url_1": null,
          "link_url_2": null,
          "link_url_3": null
        },
        ...., 
        ....,
    ]
}
```



### Home Category And Products

- Method: `GET`

- URL: `https://ecom.nexerb.xyz/api/home-categories`

#### Request Example 

```js
const options = {
    method: 'GET',
    url: 'https://ecom.nexerb.xyz/api/home-categories',
};

axios.request(options).then(function (response) {
    //....
}).catch(function (error) {
    //...
});
```

#### Example Response `200`

```
{
"status": "success",
"message": "",
"figure": [
        {
            "slug": "trending-products",
            "name": "Trending Products",
            "sequence": 1,
            "products": [
                {
                    "sequence": 0,
                    "product": {
                        "slug": "jed-pfannerstill",
                        "brand": null,
                        "category": null,
                        "thumbnail": "https:\/\/via.placeholder.com\/300x400.png\/00ee99?text=atque",
                        "in_stock": 1,
                        "price": 1492,
                        "discount_amount": 10,
                        "after_discount_price": 1482
                    }
                },
                ...,
                ...
            ]
        },
        {
            "slug": "top-products",
            "name": "Top Products",
            "sequence": 2,
            "products": [
                {
                    "sequence": 0,
                    "product": {
                        "slug": "karlee-jaskolski",
                        "brand": null,
                        "category": null,
                        "thumbnail": "https:\/\/via.placeholder.com\/300x400.png\/00cc88?text=animi",
                        "in_stock": 1,
                        "price": 1280,
                        "discount_amount": 0,
                        "after_discount_price": 1280
                    }
                },
                ...,
                ...
            ]
        },
        ...., 
        ....,
    ]
}
```



### Search Suggestions

- Method: `GET`

- URL: `https://ecom.nexerb.xyz/api/search-suggestion`

#### Request Example

```js
const options = {
    method: 'GET',
    url: 'https://ecom.nexerb.xyz/api/search-suggestion',
};

axios.request(options).then(function (response) {
    //....
}).catch(function (error) {
    //...
});
```

#### Example Response `200`

```
{
  "status": "success",
  "message": "",
  "figure": {
    "keywords": [
      "blazer",
      "jackets",
      "sweatshirt"
    ],
    "suggestion": [
      {
        "title": "Trending Product",
        "products": [
          {
            "slug": "dallin-vonrueden",
            "brand": null,
            "category": null,
            "thumbnail": "https://via.placeholder.com/300x400.png/0011aa?text=dignissimos",
            "in_stock": 1,
            "price": 44449.94986,
            "discount_amount": 153896295.5,
            "after_discount_price": -153851845.55014
          },
          ....,
          ....
        ]
      },
      ....,
      ....,
    ]
  }
}
```

### Search Products

- Method: `GET`

- URL: `https://ecom.nexerb.xyz/api/products`

#### Request Example

```js
const options = {
    method: 'GET',
    url: 'https://ecom.nexerb.xyz/api/products',
};

axios.request(options).then(function (response) {
    //....
}).catch(function (error) {
    //...
});
```

#### Request Available Parameters 

| **Parameter**   | **Value**                | **Explanation**                                                                                  |
|-----------------|--------------------------|--------------------------------------------------------------------------------------------------|
| **limit**       | `20`                    | Limits the number of items returned in the response to 20.                                       |
| **offset**      | `0`                     | Starts fetching results from the beginning (offset 0).                                           |
| **q**           | `"..."`                 | The search query, which can be a keyword or phrase (currently unspecified in the example).       |
| **min_price**   | `0`                     | Sets the minimum price of items to be included in the results (0 indicates no minimum price).    |
| **max_price**   | `0`                     | Sets the maximum price of items to be included in the results (0 indicates no maximum price).    |
| **tags**        | `"panjabi+jacket"`      | Filters items by specific tags (in this case, "panjabi" and "jacket").                           |
| **vrt**         | `"small+medium"`        | Filters items based on variations (here, only "small" and "medium" sizes will be included).  |
| **collections** | `"all-winter+casual-shirts"`        | Filters items based on variations (here, only "small" and "medium" sizes will be included).  |
| **sort_by**     | `"price-desc"`          | Specifies the sorting order; results will be sorted by price in descending order (highest to lowest). |


#### Example Response `200`

```
{
  "status": "success",
  "message": "",
  "figure": {
    "count_of_product": 50,
    "query": {
      "limit": 20,
      "offset": 0,
      "q": "...",
      "min_price": 0,
      "max_price": 0,
      "tags": "panjabi+jacket",
      "vrt": "small+medium",
      "sort_by": "price-desc"
    },
    "sort_by": {
      "price-desc": "Price, high to low",
      "price-asc": "Price, low to high",
      "best-selling": "Best Selling",
      "stock_available": "Availability",
      "title-asc": "Alphabetically, A-Z",
      "title-desc": "Alphabetically, Z-A",
      "date-desc": "Date, Old To New",
      "date-asc": "Date, New to Old",
      "sale-off": "Sale Off"
    },
    "collections": [
      {
        "name": "All Winter",
        "slug": "all-winter",
        "count_of_product": 10
      },
      ...,
      ...,
      
    ],
    "tags": [
      {
        "name": "alias",
        "count_of_product": 1
      },
      ...,
      ...,
      
    ],
    "price_range": {
      "min": -260.94,
      "max": 9800.42
    },
    "variations": [
      {
        "name": "Size",
        "options": [
          {
            "id": 1,
            "name": "Small",
            "count_of_product": 10
          },
          ...,
          ...,
        ]
      },
      ...,
      ...,
    ],
    "products": [
      {
        "slug": "jarrett-bayer",
        "brand": null,
        "category": null,
        "thumbnail": "https://via.placeholder.com/300x400.png/00bb33?text=sunt",
        "thumbnail_next": "https://via.placeholder.com/300x400.png/00aa00?text=quidem",
        "in_stock": 0,
        "price": 7175.19,
        "discount_amount": "96%",
        "after_discount_price": 7079.19
      },
      ...,
      ...,
    ]
  }
}
```

