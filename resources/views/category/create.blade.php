<x-app-layout>
    <x-slot name="header">
        List All the Categories
    </x-slot>

    <h1>Create New Category</h1>

    @if($category->exists)
    <form id="category_form" method="post" action="{{ route('categories.update', [$category->id]) }}" enctype="multipart/form-data">
        @method('PUT')
    @else
    <form id="category_form" method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
    @endif
        @csrf
        <div class="form-floating mb-3">
            <input class="form-control @error('name') is-invalid @enderror" id="categoryName" type="text" placeholder="Category Name" name="name" value="{{ old('name', $category->name) }}" />
            <label for="categoryName">Category Name</label>
            @error('name')
            <div class="invalid-feedback w-100">{{ $message }}</div>
            @enderror
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
