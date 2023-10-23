<x-pelapor>
  <h1 class="text-3xl font-bold">
      Welcome page
  </h1>

  
  @auth
  <h2> Hello {{auth()->user()->username}} </h2>
  <form action="/logout" method="post">
    @csrf
    <button type="submit">Logout</button>
  </form>
  @else
  <a href="/login" class="underline">Login</a>
  @endauth
</x-pelapor>