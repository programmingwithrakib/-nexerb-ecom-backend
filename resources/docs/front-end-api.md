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

