# flomo-api

```javascript
fetch(
    "http://flomo.nexmoe.com/index.php",
    {
        method: "POST",
        body: JSON.stringify({
            flomoapi: "xxxx",
            content: "testtest",
        }),
        headers: {
            'content-type': 'application/json'
        },
    }
)
    .then(function(response) {
    return response.text();
})
    .catch(function(e) {
    console.error(e);
});
```