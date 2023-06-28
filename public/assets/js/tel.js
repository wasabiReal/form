const input = document.querySelector(".tel");

const prefixNumber = (str) => {
    if (str === "7") {
        return "1 (";
    }
    if (str === "8") {
        return "1 (";
    }
    if (str === "9") {
        return "1 (9";
    }
    return "1 (";
};

// ======================================
input.addEventListener("input", (e) => {
    const value = input.value.replace(/\D+/g, "");
    const numberLength = 11;

    let result;
    if (input.value.includes("+8") || input.value[0] === "8") {
        result = "";
    } else {
        result = "+";
    }

    //
    for (let i = 0; i < value.length && i < numberLength; i++) {
        switch (i) {
            case 0:
                result += prefixNumber(value[i]);
                continue;
            case 4:
                result += ") ";
                break;
            case 7:
                result += "-";
                break;
            default:
                break;
        }
        result += value[i];
    }
    //
    input.value = result;
});