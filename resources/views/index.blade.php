<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		table,td,tr,th{
			border:2px solid black;
			padding: 5px;
			border-collapse: collapse;
		}
	</style>
	<title></title>
</head>
<body>
	<table>
		<tr>
			<th>#</th>
			<th>სახელი</th>
			<th>დამატების თარიღი</th>	
			<th>სურათი</th>
	@foreach ($products as $product)
		<tr>	
				<td>{{ ++$loop->index }}</td>
				<td><a href="{{ route('show',["id"=>$product->id]) }}">{{ $product['title']}}</a></td>
				<td>{{ $product['updated_at']}}</td>
				<td><img src="/images/{{$product->image}}" alt="{{$product->title}}" class="list_img" style="width:130px;" /></td>
{{-- 				<td>
                    <form method="POST" action="{{ route('destroy') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$book->id}}">
                        <button>delete</button>                     
                    </form>
                        <form method="POST" action="{{ route('edit') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$book->id}}">
                        <button>edit</button>                     
                    </form>
				</td> --}}				
			</tr>
	@endforeach
</body>
</html>