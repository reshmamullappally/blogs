<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Posts') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
    <a href="{{route('posts.create')}}" >Create New Post</a>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <form name="createPostForm" action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    Title: <input type="text" name="title" value="{{old('title')}}">
                    @error('title')
                    <label>{{$message}}</label>
                    @enderror
                    Content: <textarea name="content">{{old('content')}}</textarea>
                    @error('content')
                    <label>{{$message}}</label>
                    @enderror
                    Post Image: <input type="file" name="post_image">
                    @error('post_image')
                    <label>{{$message}}</label>
                    @enderror
                    <input type="submit" name="create_post" value="Submit">
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
