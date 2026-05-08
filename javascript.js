/* =========================
   1. PROGRESS BAR ANIMATION
========================= */
document.addEventListener("DOMContentLoaded", function () {
    const bars = document.querySelectorAll(".progress");

    bars.forEach(bar => {
        let finalWidth = bar.style.width;
        bar.style.width = "0%";

        setTimeout(() => {
            bar.style.width = finalWidth;
        }, 300);
    });
});


/* =========================
   2. COLOR BASED ON PERCENT
========================= */
document.querySelectorAll(".progress").forEach(bar => {
    let percent = parseInt(bar.innerText);

    if(percent < 40){
        bar.style.background = "#dc2626"; // red
    } 
    else if(percent < 70){
        bar.style.background = "#f59e0b"; // yellow
    } 
    else {
        bar.style.background = "#16a34a"; // green
    }
});


/* =========================
   3. Change background on question click (TEST PAGE)
========================= */

document.querySelectorAll(".question-box").forEach(box => {
    box.addEventListener("click", () => {
        box.style.background = "#dbeafe";
    });
});

/* =========================
   4. FORM VALIDATION (TEST PAGE)
========================= */
const form = document.querySelector("form");

if(form){
    form.addEventListener("submit", function(e){
        const checked = document.querySelectorAll("input[type='radio']:checked");

        if(checked.length === 0){
            alert("Please select at least one answer!");
            e.preventDefault();
        }
    });
}


