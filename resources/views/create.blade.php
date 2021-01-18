<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <h2>-პროდუქტების დამატება-</h2> 
	         <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                @csrf
                <h3 class="heads">სათაური:
                    <input type="text" name="title" placeholder="title">
                <div id="listing">
                    <div id="inside">
                        <div id="inside_left">
                        <div id="inside_img">
                          სურათი:
                        <span>
                        <input type="file" name="image">
                        <div id="inside_price">ფასი: <span><input type="number" name="price" placeholder="price"></span></div>
                        <div id="inside_add_to">
                        </div>
                        <div class="inside_names inside_names_big">
                        კატეგორია: <span><input type="number" name="category" placeholder="category"></span>
                        </div>
                        <div class="inside_names">
                        აღწერა: <span></span>
                        <input type="text" name="description" placeholder="description">
                        </div>
                        <div class="inside_names inside_names_big" >
                        ჩამატება:
                        <span>
                        </span>
                        <button type="submit" class="btn btn-submit red">Submit</button>
                        </div>
                        <div class="clear"></div>
                        </div>
                    <div class="clear"></div>
                </div>
            </form>
            <br>
            <br>
            <br>
    <h2>-პროდუქტები-</h2>        
    <table>
        <tr>
            <th>#</th>
            <th>სახელი</th>
            <th>დამატების თარიღი</th>   
            <th>სურათი</th>
            <th>ჩასწორება</th>
            <th>წაშლა</th>
    @foreach ($products as $product)
        <tr>    
                <td>{{ ++$loop->index }}</td>
                <td><a href="{{ route('show',["id"=>$product->id]) }}">{{ $product['title']}}</a></td>
                <td>{{ $product['updated_at']}}</td>
                <td><img src="/images/{{$product->image}}" alt="{{$product->title}}" class="list_img" style="width:130px;" /></td>

                <td><a href="{{ route('edit',["id"=>$product->id]) }}">ჩასწორება</a>
                </td> 
                <td>
                    <form method="POST" action="{{ route('destroy') }}" onsubmit="return confirm('Are you sure you want to delete?');">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$product->id}}">
                                    <button type="submit" style="color:#F03B42">წაშლა</button>                     
                    <form> 
                </td>       

            </tr>
    @endforeach

</body>
</html>