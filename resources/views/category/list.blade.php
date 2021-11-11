<x-app-layout>
    <x-slot name="header">
        List All the Categories
    </x-slot>

    <div class="card">
        <div class="card-header">
            <h1 class="text text-black float-start">Categories Listing</h1>
            <a href="{{ route('categories.create') }}" type="button" class="btn btn-lg btn-primary text-white float-end">Create New</a>
        </div>
        <div class="card-body">

            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="50">#</th>
                        <th scope="col">Name</th>
                        <th scope="col" width="250" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $category->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('categories.edit', $category->id)  }}" class="btn btn-outline-success">Edit</a>

                            <form action="{{ route('categories.destroy', $category) }}"
                                  method="post" class="d-inline-block"
                                  onsubmit="return confirm('Are you sure want to delete?');">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>

</x-app-layout>
