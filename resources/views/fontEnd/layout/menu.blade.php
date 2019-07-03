
<div class="content">
    <div id="jquery-accordion-menu" class="jquery-accordion-menu" style="border-radius: 20px">
        <div class="jquery-accordion-menu-header">Category </div>
        <ul>
            <li class="active" ><a href="#">All </a></li>
           @foreach($category as $cat)
                <li class=""><a href="{{route('product.get',['id'=>$cat->id])}}">{{$cat->name}}</a> </li>
               @endforeach
        </ul>
        <div class="jquery-accordion-menu-footer">Footer </div>
    </div>
</div>
