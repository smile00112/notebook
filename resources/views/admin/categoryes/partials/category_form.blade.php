<label for="">Статус</label>
<select class="form-control" name="published">
  @if (isset($category->id))
    <option value="0" @if ($category->published == 0) selected="" @endif>Не опубликовано</option>
    <option value="1" @if ($category->published == 1) selected="" @endif>Опубликовано</option>
  @else
    <option value="0">Не опубликовано</option>
    <option value="1">Опубликовано</option>
  @endif
</select>

<label for="">Наименование</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок категории" value="@if (isset($category->title)){{$category->title}} @endif" required>

<label for="">Slug</label>
<input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация" value="@if (isset($category->slug)){{$category->slug}} @endif{{--$category->slug or ""--}}" readonly="">

<label for="">Описание</label>
<textarea  class="form-control" name="description" placeholder="Описание">@if (isset($category->description)){{$category->description}} @endif</textarea>

<label for="">Контент</label>
<textarea  class="form-control" name="content" placeholder="Контент">@if (isset($category->content)){{$category->content}} @endif</textarea>


<label for="">Родительская категория</label>
<select class="form-control" name="parent_id">
  <option value="0">-- без родительской категории --</option>
  @include('admin.categoryes.partials.categoryes', ['categoryes' => $categoryes])
</select>

<hr />

<input class="btn btn-primary" type="submit" value="Сохранить">