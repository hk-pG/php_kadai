export const insertDateElement = (element: HTMLElement) => {
	setInterval(() => {
		const date = new Date();
		const dayOfWeek = date.toLocaleString('en-US', { weekday: 'long' });
		const month = date.toLocaleString('en-US', { month: 'long' });
		const day = date.getDate();
		const year = date.getFullYear();
		const hours = date.getHours();
		const minutes = date.getMinutes();
		const seconds = date.getSeconds();

		element.innerHTML = `${dayOfWeek}, ${month} ${day}, ${year} ${hours}:${minutes}:${seconds}`;
	}, 1000);
};
