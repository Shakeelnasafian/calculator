<div class="calculators-plugin" x-data="bmiCalculator()">
    <h3>BMI Calculator</h3>
    <div class="row mb-3">
        <div class="col">
            <input type="number" class="form-control" placeholder="Weight (kg)" x-model.number="weight">
        </div>
        <div class="col">
            <input type="number" class="form-control" placeholder="Height (cm)" x-model.number="height">
        </div>
    </div>
    <button class="btn btn-primary w-100" @click="calculate">Calculate BMI</button>
    <div class="result" x-show="bmi !== null">
        <strong>Your BMI:</strong> <span x-text="bmi"></span>
        <div x-text="category"></div>
    </div>
</div>
<script>
function bmiCalculator() {
    return {
        weight: '',
        height: '',
        bmi: null,
        category: '',
        calculate() {
            if (this.weight && this.height) {
                let h = this.height / 100;
                this.bmi = (this.weight / (h * h)).toFixed(2);
                if (this.bmi < 18.5) this.category = 'Underweight';
                else if (this.bmi < 25) this.category = 'Normal weight';
                else if (this.bmi < 30) this.category = 'Overweight';
                else this.category = 'Obese';
            }
        }
    }
}
</script>
