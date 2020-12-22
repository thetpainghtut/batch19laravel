{{-- <div>
    Simplicity is the consequence of refined emotions. - Jean D'Alembert
</div> --}}

@foreach($categories as $category)
  <a href="{{route('filterpage',$category->id)}}" class="dropdown-item">{{$category->name}}</a>
@endforeach