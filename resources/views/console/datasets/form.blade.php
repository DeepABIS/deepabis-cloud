@if($errors->isNotEmpty())
    <div class="alert alert-danger">Please fill out all required fields.</div>
@endif
<div class="form-group">
    <label class="text-normal text-dark" for="name">Name</label>
    <input required type="text" class="form-control" placeholder="Name" name="name" id="name" value="{{ $dataset->name }}">
</div>
<div class="form-group">
    <label for="test_size">Test size</label>
    <input required id="test_size" name="test_size" type="number" class="form-control" step="any" placeholder="0.1" value="{{ $dataset->test_size }}">
</div>
<div class="form-group">
    <label for="species">Species</label>
    <treeselect
        :multiple="true"
        :options='@json($genera)'
        placeholder="Select species to include"
        name="species[]"
        :value='@json($selected)'
        :branchNodesFirst="true"
    ></treeselect>
</div>
