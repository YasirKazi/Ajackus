@extends('category.createCategory')

@section('editId', $item->id)
@section('editName', $item->name)

@section('editMethod')
{{method_field('PUT')}}
@endSection