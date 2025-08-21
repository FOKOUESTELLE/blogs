<x-layout>
    <div class="space-y-10 md:space-y-16">

           @forelse ($posts as $post)
               <x-post :$post list/>

               @empty

               <p class="text-slate-400 text-center">Aucun resultat</p>

           @endforelse

            {{ $posts->links() }}
      
    </div>
</x-layout>
