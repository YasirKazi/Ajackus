@extends('product.createProduct')


@section('editId', $item->id)
@section('editName', $item->name)
@section('editDescription', $item->description)
@section('editPrice', $item->price)
@section('editImgUrl', $item->image_url)
@section('editImgUrl', $item->image_url)
@section('editCategoryId', $categoryData[0]->id)
@section('editCategoryName', $categoryData[0]->name)

@section('editMethod')
{{method_field('PUT')}}
@endSection