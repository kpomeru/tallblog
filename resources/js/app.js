import "./bootstrap";
import Alpine from "alpinejs";
window.Alpine = Alpine;

const currentTheme = localStorage.getItem("theme");

Alpine.data("dropdown", () => ({
    dropdownOpen: false,
}));

Alpine.data("loadingMask", () => ({
    pageLoaded: false,
    init() {
        window.onload = (event) => {
            this.pageLoaded = true
        };
    }
}));

Alpine.data("themeData", () => ({
    categoryMenuOpen: false,

    isDark: currentTheme
        ? currentTheme === "dark"
        : window.matchMedia("(prefers-color-scheme: dark)").matches,

    init() {
        this.setTheme();
        this.$watch("isDark", () => this.saveState());
    },

    setTheme() {
        this.isDark
            ? document.documentElement.classList.add("dark")
            : document.documentElement.classList.remove("dark");
    },

    saveState() {
        this.setTheme();
        localStorage.setItem("theme", this.isDark ? "dark" : "light");
    },

    themeDataToggleIsDark() {
        this.isDark = !this.isDark;
    },
}));

Alpine.start();
