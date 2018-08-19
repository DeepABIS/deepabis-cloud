<div class="form-row">
    <div class="col-2">
        <label class="text-normal text-dark">Genus</label>
        <vue-simple-suggest
            :list='@json($genera->map(function ($genus) { return $genus->genus; }))'
            value="{{ $species->genus }}"
            name="genus"
            autocomplete="off"
            :filter-by-query="true"
            placeholder="Genus"
        ></vue-simple-suggest>
    </div>
    <div class="col">
        <label class="text-normal text-dark">Species</label>
        <input type="text" class="form-control" placeholder="Name" name="species" value="{{ $species->species }}">
    </div>
</div>
<br>

