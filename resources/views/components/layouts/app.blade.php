<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{$metaDescription ?? 'Default meta description'}}">
    <title>{{$title ?? 'Defaul title'}}</title>
    @vite(['resources/css/app.scss','resources/js/app.js'])
</head>
<x-layouts.navigation/>
{{$slot}}
</html>
