<select name="category_name" id="">
    <option value="">Category</option>
    @foreach($categories as $category)
        <option value="{{ $category->name }}">{{ $category->name }}</option>
    @endforeach
</select>