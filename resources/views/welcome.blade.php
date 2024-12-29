<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>API Documentation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/styles/default.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
        <link href="{{asset("assets/vendors/bootstrap/bootstrap.min.css")}}" rel="stylesheet">
        <link href="{{asset("assets/css/style.css")}}" rel="stylesheet">

        {{--<script src="https://cdn.jsdelivr.net/npm/markdown-it@14.1.0/dist/markdown-it.min.js"></script>--}}
        <script src="https://momentjs.com/downloads/moment.min.js"></script>
        <script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js"></script>
        <script src="{{asset("assets/vendors/markdown-it.min.js")}}"></script>
        <script>
            const md = window.markdownit();
        </script>
    </head>
    <body>
        <div class="container mt-3">
            <div id="markdown" class=" p-4 bg-white text-dark py-2">
                <script>
                    document.write(md.render(@json(file_get_contents(resource_path('/docs/front-end-api.md')))))
                </script>
            </div>
        </div>

        <script>
            document.querySelectorAll('pre code').forEach((block) => {
                hljs.highlightElement(block);
            });
        </script>
    </body>
</html>
