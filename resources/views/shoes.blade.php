@include('layout.base')
<!DOCTYPE html>
<html lang="ru">
@yield('head')
<body>
    <div class="wrapper">
        @yield('header')
        <main class="shoes_main flex">
            <img src="/storage/<?=$product->img?>" alt="">
            <div class="shoes_content">
                <div class="shoes_info">
                    <div class="shoes_category"><?=$product->category?></div>
                    <div class="shoes_name"><?=$product->name?></div>
                </div>
                <div class="shoes_price flex">
                    <? if(empty($product->sale)): ?>
                    <div class="price"><?=$product->price.'$'?></div>    
                    <? else: ?>
                    <div class="price sale_price">
                        <? echo $product->price - ($product->price * ($product->sale / 100));?>$<span class="decor_text"><?=$product->price.'$'?></span>
                    </div>
                    <? endif ?>
                </div>
                <div class="add_to_basket_cont">
                    <div class="sf832k">Size</div>
                    <select name="shoes_size" id="shoes_size">
                        <option value="39">39</option>
                        <option value="40">40</option>
                        <option value="41">41</option>
                        <option value="42">42</option>
                        <option value="43">43</option>
                        <option value="44">44</option>
                    </select>
                    <? if(!empty($_SESSION['products'][$product->name])): // Если товар есть в корзине?>
                        <button type="submit" class="shoes_button" id="add_to_basket" style="background: #209E1E;">Add to basket</button>
                        <? else: ?>
                        <button type="submit" class="shoes_button" id="add_to_basket">Add to basket</button>
                    <? endif ?>
                </div>
                <div class="shoes_description_cont">
                    Description
                    <div class="shoes_description">
                        <?=$product->description?>
                    </div>
                </div>
                <button type="submit" class="shoes_button">Read comments</button>
                <div class="add_comment" style="margin-top: 10px;">
                    <div class="shoes_description" style="height: auto;">Add comment</div> 
                    <form action="{{ route('admin.products.add_comment', ['id' => $product->id]) }}" method="post" style="margin-top: 0px;">
                        @csrf
                        <textarea placeholder="Comment" style="width: 300px;height: 100px;" name="text"></textarea> <br>
                        <button type="submit">Submit</button>
                    </form>
                </div>
                
            </div>
        </main>
        <div class="shoes_description_cont">
            <div class="">
                <br>
                Comments
            </div>
            
            <div class="shoes_comments">
                @foreach($comments as $comment)
                <div class="shoes_comment shoes_description" style="height: auto;">
                    <div class="shoes_comment_text">
                        {{ $comment->text }} <br>
                    </div>
                    <div class="shoes_comment_author">
                        Author: 
                        {{ App\Models\User::find($comment->author)->login }}    
                    </div>
                </div>
                @endforeach   
            </div>

        </div>
    </div>
    <div class="alert">
        <div class="content">
            <div class="content__text">
                Product added to cart
            </div>
        </div>
    </div>
    <script src="{{mix('js/alert.js')}}"></script>
    <script src="{{mix('js/app.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function(){

            $('#add_to_basket').click(function(){
                $.ajax({
                    type : 'post',
                    url : '/basket',
                    data : {
                        'id': '<?=$product->id?>',
                        'name': '<?=$product->name?>',
                        'img': '<?=$product->img?>',
                        'price': <?=$product->price?>,
                        'size': $('#shoes_size').val(),
                        <? if(!empty($product->sale)): ?>
                        'sale': <?=$product->sale?>,
                        <? endif ?>
                        'category': '<?=$product->category?>',
                    },
                    success : $('#add_to_basket').css('background', '#209E1E'),
                })
            })  
             
            $('.shoes_button').click(function(){

            })
            
        })
        
    </script>
</body>
</html>