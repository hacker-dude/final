<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="{{ route('update') }}" enctype="multipart/form-data">
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
                        შეცვლა:
                        <span>
                        </span>
                        <button type="submit" class="btn btn-submit red">შეცვლა</button>
                        </div>
                        <div class="clear"></div>
                        </div>
                    <div class="clear"></div>
                </div>
            </form>

</body>
</html>