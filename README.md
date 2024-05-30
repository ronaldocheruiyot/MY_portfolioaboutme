# My Portfolio Website

Welcome to my personal portfolio website Here, I showcase my projects, skills, and experiences that reflect my journey as a developer. Whether you're looking for inspiration, seeking collaboration opportunities, or simply curious about my work, feel free to explore.

## Features

- **Projects Showcase**: Dive into a curated selection of my projects, ranging from web applications to innovative solutions. Each project comes with a detailed description, technologies used, and live demos where applicable.
- **Skills Overview**: Get an insight into my technical expertise across various domains such as front-end development, back-end engineering, and full-stack development. The skills section is regularly updated to reflect my continuous learning and growth.
- **Experiences**: Learn about my professional journey, including internships, part-time roles, and freelance projects. This section provides a glimpse into my practical experience and contributions to real-world projects.

## Technical Implementation

My portfolio is built with modern web technologies to ensure a seamless browsing experience across devices. It leverages the power of HTML5, CSS3, and JavaScript, along with responsive design principles to adapt to different screen sizes.

### Hosting and Redirection Setup

The portfolio is hosted on an Ubuntu server running Nginx. A key feature of the site's infrastructure is the custom 301 Moved Permanently redirection implemented for the `/redirect_me` endpoint. This redirection ensures that visitors are seamlessly directed to relevant sections of the site, enhancing navigation and user experience.

#### Configuration Details

The redirection was achieved by configuring Nginx to listen on port 80 and redirect requests for `/redirect_me` to a designated page within the portfolio. This setup was automated using a Bash script (`3-redirection`) that sets up the Ubuntu machine and applies the necessary Nginx configurations.

Example request and response:


Feel free to reach out if you have any questions or would like to discuss potential collaborations. Let's connect!

---

Thank you for visiting my portfolio!

