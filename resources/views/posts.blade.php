<x-layout :title="$title">

    {{-- @foreach ($posts as $post)  
    <article class="py-8 max-w-3xl border-b border-gray-300">
        <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
            <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post->title }}</h2>
        </a>
        <div class="text-base text-gray-500">
            By <a href="/authors/{{ $post->author->username }}" class="hover:underline text-red-400">{{ $post->author->name }}</a> | {{ $post->created_at->diffForHumans() }} | Category : <a href="/categories/{{ $post->category->slug }}" class="hover:underline text-blue-400">{{ $post->category->name }}</a>
        </div>
        <p class="my-4 font-light">{{ Str::limit($post['body'], 100) }}</p>
        <a href="/posts/{{ $post['slug'] }}" class="font-medium text-blue-500 hover:underline">Baca Selengkapnya &raquo;</a>
    </article>
    @endforeach --}}

  <div class="py-8 px-4 mx-auto max-w-7xl lg:py-16 lg:px-6">
    <form class="max-w-2xl mx-auto" action="/posts">
        @if(request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        @if(request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
        @endif
        <div class="flex shadow-xs rounded-base -space-x-0.5 ">
            <label for="search-dropdown" class="block mb-2.5 text-sm font-medium text-heading sr-only ">Your Email</label>
            <button id="dropdown-button" data-dropdown-toggle="dropdown" type="button" class="inline-flex items-center shrink-0 z-10 text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary font-medium leading-5 rounded-s-base text-sm px-4 py-2.5 focus:outline-none hover:cursor-pointer">
                <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z"/></svg>
                {{ request('category') ? $categories->firstWhere('slug', request('category'))->name : 'All categories' }}
                <svg class="w-4 h-4 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/></svg>
            </button>
            <div id="dropdown" class="z-10 hidden bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-44">
                <ul class="p-2 text-sm text-body font-medium" aria-labelledby="dropdown-button">
                    <li>
                        <a href="/posts{{ request('author') ? '?author=' . request('author') : '' }}" class="block p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded-md">All categories</a>
                    </li>
                    @foreach ($categories as $category)
                    <li>
                        <a href="/posts?category={{ $category->slug }}{{ request('author') ? '&author=' . request('author') : '' }}" class="block p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded-md">{{ $category->name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <input type="search" id="default-search" id="input-group-1" class="px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm focus:ring-brand focus:border-brand block w-full placeholder:text-body" placeholder="Search post title..." autofocus name="search" value="{{ request('search') }}">
            <button type="submit" class="inline-flex items-center  text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-e-base text-sm px-4 py-2.5 focus:outline-none hover:cursor-pointer">
            <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>
            Search
            </button>
        </div>
    </form>
      <div class="grid gap-8 lg:grid-cols-2 my-7">
        @forelse ($posts as $post)        
            <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md">
                <div class="flex justify-between items-center mb-5 text-gray-500">
                    <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded hover:underline">
                        <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                    </span>
                    <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
                </div>
                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"><a href="/posts/{{ $post['slug'] }}">{{ $post->title }}</a></h2>
                <p class="mb-5 font-light text-gray-500">{{ Str::limit($post['body'], 100) }}</p>
                <div class="flex justify-between items-center">
                    <a href="/posts?author={{ $post->author->username }}" class="inline-flex items-center font-medium text-gray-900 hover:underline">
                        <div class="flex items-center space-x-4">
                            <img class="w-7 h-7 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="{{ $post->author->name }} avatar" />
                            <span class="font-medium  text-sm">
                                {{ $post->author->name }}
                            </span>
                        </div>
                    </a>
                    <a href="/posts/{{ $post['slug'] }}" class="inline-flex items-center font-medium text-primary-600 hover:underline text-sm">
                        Baca Selengkapnya
                        <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
            </article>
        @empty
            <p class="text-center text-gray-500">No post found.</p>                
        @endforelse
      </div>
      {{ $posts->links() }}  
  </div>
</x-layout>