<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Posts') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
    <a href="{{route('posts.create')}}" >Add Post</a>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   @foreach($posts as $post)
                   {{$post->title}}{{$post->content}}
                   @if($post->post_image)
                   <div class="image_class">
                    <image src="{{asset('storage/'.$post->post_image)}}">
                    </div>
                    @endif
                    <button class="deletePost" data-url="{{route('posts.destroy',$post->id)}}" >Delete</button>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        $(document).ready(function(){
           $(".deletePost").on("click",function(){
            var url=$(this).data('url');
            $.ajax({
                "url":url,
                "type":"POST",
                "data":{
                    "_token":"{{csrf_token()}}",
                    "_method":"DELETE"
                },
                "success":function(response){
                    if(response.status=="success")
                    {
                        location.reload();
                    }
                }
            })
           })
        })
    </script>
    @endpush
</x-app-layout>
