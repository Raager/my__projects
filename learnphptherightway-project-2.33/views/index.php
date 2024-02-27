<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Document</title>
    </head>
    <body class="p-5">
        <h2 class="" style="margin-left:auto;margin-right:auto;text-align:center">Make Transactions</h2>
        <div class="flex justify-items-center">
            <form action="/transaction/create" method="post" class="m-3">
                <input type="number" name="amount" class="form-control m-3"placeholder="amount">
                <input type="text" name="descriptions" class="form-control m-3" placeholder="description">
                <button type="submit" class="btn btn-primary m-3" name="save">Submit</button>
                <button class="btn btn-primary m-3" style="text-align:center; width:auto">
                    <a href="/transactions" class="link-light">Show all</a>
                </button>
            </form>
        </div>
    </body>
</html>
