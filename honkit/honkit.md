# Honkit Setup Guide (Linux)

This guide walks you through installing Honkit and its dependencies on a Linux system.

---

## 1. Install Node Version Manager (NVM)

Download and install **NVM**:

```bash
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.40.3/install.sh | bash
````

Load NVM into your current shell session (without restarting):

```bash
\. "$HOME/.nvm/nvm.sh"
```

Verify that NVM is installed:

```bash
nvm --version
```

---

## 2. Install Node.js

Install Node.js version 25 using NVM:

```bash
nvm install 25
```

Verify Node.js and npm versions:

```bash
node -v  # Should print "v25.2.1"
npm -v   # Should print "11.6.2"
```

> If you need a different version of Node.js or npm, check the [official Node.js website](https://nodejs.org/en/) for instructions.

---

## 3. Install Honkit

With Node.js installed, install Honkit globally:

```bash
npm install -g honkit
```

Verify the installation:

```bash
honkit --version
```

---

## 4. Create a New Honkit Project

Navigate to your preferred workspace:

```bash
mkdir ~/folder
cd ~/folder
honkit init
```

Follow the prompts to configure your project. After initialization, start the local server:

```bash
honkit serve
```

Your site should now be available at: [http://localhost:4000](http://localhost:4000)

---

## 5. Resources

* [Honkit Documentation](https://honkit.netlify.app/)
* [Node.js Downloads](https://nodejs.org/en/)
* [NVM GitHub](https://github.com/nvm-sh/nvm)