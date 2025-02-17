import Toastify from "toastify-js";
import "toastify-js/src/toastify.css";

export function showToast(message, type = "success") {
    const colors = {
        success: "#73C7C7",
        error: "#FB9EC6",
        warning: "F6C794",
    };

    Toastify({
        text: message,
        duration: 3000,
        gravity: "top",
        position: "right",
        stopOnFocus: true,
        style: {
            background: colors[type] || colors.success,
            borderRadius: "10px",
            padding: "12px 20px",
            boxShadow: "0px 4px 10px rgba(0, 0, 0, 0.2)",
            fontFamily: "'Poppins', sans-serif",
            fontSize: "14px",
            fontWeight: "500",
            color: "#fff",
        },
    }).showToast();
}
