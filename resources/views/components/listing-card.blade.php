@props(['listing'])
<x-card>
    <div class="flex">
      <img src="{{$listing->logo ? asset('storage/' .$listing->logo) : asset('/images/workhubimage.jpg')}}" class="hidden w-48 mr-6 md:block" alt="">
      <div class="">
        <h3 class="text-2xl">
          <a href="/listings/{{$listing->id}}">{{$listing ->title}}</a>
        </h3>
  <div class="text-xl font-bold mb-4">{{$listing->company}}
  </div>
  <x-listing-tags :tagsCsv="$listing->tags"/>
  
  <div class="text-lg mt-4">
    <i class="fa-solid fa-location">{{$listing->location}}</i>

    </div>
    </div>

  </div>
</x-card>