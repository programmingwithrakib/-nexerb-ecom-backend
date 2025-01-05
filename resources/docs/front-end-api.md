# Single Vendor E-com front end API Docs

### All Categories 

- Method: `GET` 

- URL: `https://ecom.nexerb.xyz/api/categories`

### Request Example 

```js
const options = {
method: 'GET',
url: 'http://127.0.0.1:8000/api/categories',
};

axios.request(options).then(function (response) {
//....
}).catch(function (error) {
//...
});
```
### Example Response `200`

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

### Home Category And Products

- Method: `GET`

- URL: `https://ecom.nexerb.xyz/api/home-categories`

### Request Example 

```js
const options = {
method: 'GET',
url: 'http://127.0.0.1:8000/api/home-categories',
};

axios.request(options).then(function (response) {
//....
}).catch(function (error) {
//...
});
```

### Example Response `200`

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


