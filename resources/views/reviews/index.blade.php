@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <div class="border p-4">
        <h1 class="h4 mb-4 font-weight-bold">
            新規レビュー投稿
        </h1>

        <form method="POST" action="{{ route('review.create', ['id' => $shop_id]) }}">
            @csrf
 
            <fieldset class="mb-4">
  
                <div class="form-group">
                    <label for="review">
                        評価
                    </label>

                    <select type="text" name="review">
                        <option value = "" selected>選択してください</option>
                        @foreach(config('const.const.score') as $key => $score)
                            @if((!empty($request->review) && $request->review == $key) || old('review') == $key )
                                <option value="{{ $key }}" selected>{{ $score['label'] }}</option>
                            @else
                                <option value="{{ $key }}">{{ $score['label'] }}</option>
                            @endif
                        @endforeach
                    </select>

                    @if ($errors->first('review'))
                        <div class="invalid-feedback">
                            {{ $errors->first('review') }}
                        </div>
                    @endif
                </div>
 
                <div class="form-group">
                    <label for="comment">
                        コメント
                    </label>
 
                    <textarea
                        id="comment"
                        name="comment"
                        class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}"
                        rows="4"
                    >{{ old('comment') }}</textarea>
                    @if ($errors->has('comment'))
                        <div class="invalid-feedback">
                            {{ $errors->first('comment') }}
                        </div>
                    @endif
                </div>
 
                <div class="mt-5">
                    <a class="btn btn-secondary" href="{{ route('show', ['id' => $shop_id]) }}">
                        戻る
                    </a>
 
                    <button type="submit" class="btn btn-primary">
                        投稿する
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection
  
@section('scripts')
  <!-- フラッシュメッセージ -->
  @if (session('flash_message'))
    $(function () {
      toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-center",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "2000",
      "timeOut": "2000",
      "extendedTimeOut": "2000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
      toastr.success('{{ session('flash_message') }}');
    });
  @endif
@endsection