<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <h3 class="heads">სათაური:{{$product['title']}}
    <div id="listing">
        <div id="inside">
            <div id="inside_left">
            <div id="inside_img">
              სურათი:<img src="/images/{{$product->image}}" alt="{{$product->title}}" class="list_img" style="width:130px;" />
            <span>
            <div id="inside_price">ფასი:{{$product['price']}}</div>
            <div id="inside_add_to">
            </div>
            <div class="inside_names inside_names_big">
            კატეგორია:{{$product['category_id']}} 
            </div>
            <div class="inside_names">
            აღწერა:{{$product['description']}}        
            <div class="clear"></div>
            </div>
            <h5>likes:{{$product['likes']}}</h5>
            @auth()
            <form action="{{ Route('like') }}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button class="btn">LIKE</button>
            </form>
            @endauth
        <div class="clear"></div>
    </div>
    <br>
    <h2>COMMENTS</h2>
    @auth()
    <form action="{{ Route('addComment') }}" method="post">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <textarea name="body" id="" cols="30" required></textarea>
            <button type="submit">დაკომენტარება</button>
        </form>
    @endauth

    <br>
    @foreach($product->comments as $comment)
        <div>
            <h5>{{ $comment->user->name }}</h5>
            <p>{{ $comment->created_at->diffForHumans() }}</p>
            <p>{{ $comment->body }}</p>
        </div>
        ---------
    @endforeach

</body>
</html>