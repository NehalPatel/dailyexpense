<x-app-layout>
    <x-slot name="header">
        List All the Categories
    </x-slot>

    <h1>Create New Category</h1>
    <form id="category_form" method="post" action="{{ $category->id ? route('categories.update', [$category->id]) : route('categories.store') }}" enctype="multipart/form-data">
        @csrf
        @if($category->id)
            @method('PUT')
        @endif
        <div class="form-floating mb-3">
            <input class="form-control" id="categoryName" type="text" placeholder="Category Name" name="name" value="{{ $category->name ?? '' }}" />
            <label for="categoryName">Category Name</label>
            <div class="invalid-feedback">Category Name is required.</div>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Category Icon</label>
            <input class="form-control" type="file" id="formFile" name="icon">
        </div>

        <div class="float-end">
            <button class="btn btn-primary" id="submitButton" type="submit">Submit</button>
            <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Cancel</a>
        </div>
    </form>


</x-app-layout>
