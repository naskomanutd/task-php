/**
 * Adjusts the quantity input values for WooCommerce.
 *
 * @param {number} min - The minimum allowed quantity.
 * @param {number} max - The maximum allowed quantity.
 * @param {number} step - The step value for quantity increments/decrements.
 */
function adjustQuantityInputValues(min, max, step) {
    // Get all quantity input elements
    const quantityInputs = document.querySelectorAll('input[type="number"].qty');
 
    // Loop through each quantity input element
    quantityInputs.forEach((input) => {
        // Set the minimum, maximum, and step values for the input element
        input.min = min;
        input.max = max;
        input.step = step;
 
        // Add event listeners for input validation
        input.addEventListener('input', validateQuantityInput);
        input.addEventListener('change', validateQuantityInput);
    });
}
 
/**
 * Validates the quantity input value.
 */
function validateQuantityInput() {
    const input = this;
    const value = parseFloat(input.value);
 
    // Check if the input value is less than the minimum value
    if (value < parseFloat(input.min)) {
        input.value = input.min;
    }
 
    // Check if the input value is greater than the maximum value
    if (value > parseFloat(input.max)) {
        input.value = input.max;
    }
 
    // Check if the input value is not a multiple of the step value
    if ((value - parseFloat(input.min)) % parseFloat(input.step) !== 0) {
        input.value = parseFloat(input.min) + Math.floor((value - parseFloat(input.min)) / parseFloat(input.step)) * parseFloat(input.step);
    }
}
 
// Usage Example for adjustQuantityInputValues
 
// Adjust quantity input values for WooCommerce products
adjustQuantityInputValues(1, 10, 1);
