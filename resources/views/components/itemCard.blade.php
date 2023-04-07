<section class="bg-light pt-5 pb-5 shadow-sm">
  <div class="container">
    <div class="row pt-5">
      <div class="col-12">
        <h3 class="text-uppercase border-bottom mb-4">Browse our product</h3>
      </div>
    </div>
    <div class="row">
      @foreach ($products as $item)
      <div class="col-lg-4 mb-3 d-flex align-items-stretch">
        <div class="card">
          <img src="{{url('/product/'.$item->image)}}" class="card-img-top" alt="Card Image">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{$item->name}}</h5>
            <p class="card-text mb-4">Rp. {{$item->price}}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>