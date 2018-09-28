<div class="box-body">
    <div class='form-group{{ $errors->has("{$lang}.title") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[title]", trans('iplaces::categories.form.title')) !!}
        <?php $old = $place->hasTranslation($lang) ? $place->translate($lang)->title : '' ?>
        {!! Form::text("{$lang}[title]", old("{$lang}.title", $old), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('iplaces::places.form.title')]) !!}
        {!! $errors->first("{$lang}.title", '<span class="help-block">:message</span>') !!}
    </div>

    <div class='form-group{{ $errors->has("{$lang}[slug]") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[slug]", trans('iplaces::categories.form.slug')) !!}
        <?php $old = $place->hasTranslation($lang) ? $place->translate($lang)->slug : '' ?>
        {!! Form::text("{$lang}[slug]", old("{$lang}.slug", $old), ['class' => 'form-control slug', 'data-slug' => 'target', 'placeholder' => trans('iplaces::places.form.slug')]) !!}
        {!! $errors->first("{$lang}.slug", '<span class="help-block">:message</span>') !!}
    </div>

    <?php $old = $place->hasTranslation($lang) ? $place->translate($lang)->description : '' ?>
    @editor('content', trans('iplaces::places.form.description'), old("$lang.description", $old), $lang)

    <?php if (config('asgard.page.config.partials.translatable.edit') !== []): ?>
    <?php foreach (config('asgard.page.config.partials.translatable.edit') as $partial): ?>
    @include($partial)
    <?php endforeach; ?>
    <?php endif; ?>
</div>
