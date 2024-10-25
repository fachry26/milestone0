<h2 class="mt-5">Create Your Own Pizza!</h2>
<div class="row">
    <div class="col-md-6">
        <h5>Choose Ingredients:</h5>
        <form id="customPizzaForm">
            <div class="mb-3">
                <label for="base" class="form-label">Base</label>
                <select class="form-select" id="base" required>
                    <option value="">Select Base</option>
                    <option value="Thin Crust">Thin Crust</option>
                    <option value="Thick Crust">Thick Crust</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Toppings</label><br>
                <input type="checkbox" name="topping" value="Cheese"> Cheese<br>
                <input type="checkbox" name="topping" value="Pepperoni"> Pepperoni<br>
                <input type="checkbox" name="topping" value="Mushrooms"> Mushrooms<br>
                <input type="checkbox" name="topping" value="Olives"> Olives<br>
            </div>
            <button type="submit" class="btn btn-primary">Preview Pizza</button>
        </form>
    </div>

    <div class="col-md-6">
        <h5>Your Custom Pizza Preview:</h5>
        <div id="customPizzaPreview" class="border p-3">
            <p>Select ingredients to see your pizza.</p>
        </div>
    </div>
</div>

<script>
    var form = document.getElementById('customPizzaForm');
    var preview = document.getElementById('customPizzaPreview');

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        var base = document.getElementById('base').value;
        var toppings = [];
        var checkboxes = form.querySelectorAll('input[name="topping"]:checked');

        for (var i = 0; i < checkboxes.length; i++) {
            toppings.push(checkboxes[i].value);
        }

        var previewHTML = '<p><strong>Base:</strong> ' + base + '</p>';
        previewHTML += '<p><strong>Toppings:</strong> ' + (toppings.length > 0 ? toppings.join(', ') : 'None') + '</p>';

        preview.innerHTML = previewHTML;
    });
</script>
