
const countries = {
  "India": { code: "+91", cities: ['Kolkata', 'Delhi', 'Mumbai', 'Chennai'] },
  "United States": { code: "+1", cities: ['New York', 'Los Angeles', 'Chicago', 'Houston'] },
  "United Kingdom": { code: "+44", cities: ['London', 'Manchester', 'Birmingham', 'Glasgow'] },
  "Canada": { code: "+1", cities: ['Toronto', 'Vancouver', 'Montreal', 'Calgary'] }
};

document.addEventListener('DOMContentLoaded', function () {
    const countrySelect = document.getElementById("country");
    const citySelect = document.getElementById("city");
    const codeField = document.getElementById("phone_code");

    for (let country in countries) {
        const option = document.createElement("option");
        option.value = country;
        option.text = country;
        countrySelect.appendChild(option);
    }

    countrySelect.addEventListener("change", function () {
        const selected = countrySelect.value;
        if (!selected || !countries[selected]) return;

        codeField.value = countries[selected].code;

        citySelect.innerHTML = "";
        countries[selected].cities.forEach(city => {
            const option = document.createElement("option");
            option.value = city;
            option.text = city;
            citySelect.appendChild(option);
        });
    });
});
