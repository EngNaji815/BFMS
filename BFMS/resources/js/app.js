document.addEventListener("DOMContentLoaded", () => {
    const sidebar = document.getElementById("sidebar");
    const toggleButton = document.getElementById("sidebar-toggle");
    const closeButton = document.getElementById("sidebar-close");
    const overlay = document.getElementById("sidebar-overlay");
    const mainContent = document.getElementById("main-content");

    if (!sidebar || !toggleButton) {
        return;
    }

    const isDesktop = () => window.innerWidth >= 1024;

    function openMobileSidebar() {
        sidebar.classList.remove("-translate-x-full");
        sidebar.classList.add("translate-x-0");

        overlay?.classList.remove("hidden");

        document.body.classList.add("overflow-hidden");
    }

    function closeMobileSidebar() {
        sidebar.classList.add("-translate-x-full");
        sidebar.classList.remove("translate-x-0");

        overlay?.classList.add("hidden");

        document.body.classList.remove("overflow-hidden");
    }

    function collapseDesktopSidebar() {
        sidebar.classList.add("lg:-translate-x-full");
        sidebar.classList.remove("lg:translate-x-0");

        mainContent?.classList.remove("lg:ml-64");
        mainContent?.classList.add("lg:ml-0");
    }

    function expandDesktopSidebar() {
        sidebar.classList.remove("lg:-translate-x-full");
        sidebar.classList.add("lg:translate-x-0");

        mainContent?.classList.remove("lg:ml-0");
        mainContent?.classList.add("lg:ml-64");
    }

    let desktopSidebarOpen = true;

    toggleButton.addEventListener("click", () => {
        if (isDesktop()) {
            desktopSidebarOpen = !desktopSidebarOpen;

            if (desktopSidebarOpen) {
                expandDesktopSidebar();
            } else {
                collapseDesktopSidebar();
            }
        } else {
            const sidebarIsOpen = sidebar.classList.contains("translate-x-0");

            if (sidebarIsOpen) {
                closeMobileSidebar();
            } else {
                openMobileSidebar();
            }
        }
    });

    closeButton?.addEventListener("click", () => {
        closeMobileSidebar();
    });

    overlay?.addEventListener("click", () => {
        closeMobileSidebar();
    });

    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape" && !isDesktop()) {
            closeMobileSidebar();
        }
    });

    window.addEventListener("resize", () => {
        if (isDesktop()) {
            overlay?.classList.add("hidden");
            document.body.classList.remove("overflow-hidden");
        } else {
            closeMobileSidebar();
        }
    });
});
