export class Item
{
	title;
	deleteButtonHandler;
	editButtonHandler;
	editMode;
	editTitle;


	constructor({title, deleteButtonHandler,editButtonHandler})
	{
		this.title = String(title);
		if (typeof deleteButtonHandler === 'function')
		{
			this.deleteButtonHandler = deleteButtonHandler;
		}
		if (typeof editButtonHandler === 'function')
		{
			this.editButtonHandler = editButtonHandler;
		}
		this.editMode = true;

		this.editTitle = document.createElement('input');
		this.editTitle.classList.add('item-title-input');

	}

	editModeSwitcher(){
		if(this.editMode === true){
			this.editMode = false;
		}else{
			this.editMode = true;
		}
	}


	saveTitle(){
		this.title = this.editTitle.value;
	}

	getData()
	{
		return {title: this.title};
	}

	render()
	{

		const container = document.createElement('div');
		container.classList.add('item-container');
		const title = document.createElement('div');
		title.classList.add('item-title');
		title.innerText = this.title;



		const buttonsContainer = document.createElement('div');
		const deleteButton = document.createElement('button');
		const editButton = document.createElement('button');


		if(this.editMode) {
			container.append(title);
			editButton.innerText = "edit";
		}else{
			editButton.innerText = "ОК";
			container.append(this.editTitle);
		}

		this.editTitle.value = this.title;



		deleteButton.innerText = 'Delete';

		buttonsContainer.append(editButton);
		buttonsContainer.append(deleteButton);

		deleteButton.addEventListener('click', this.handleDeleteButtonClick.bind(this));
		editButton.addEventListener("click", this.handleEditButtonClick.bind(this));
		container.append(buttonsContainer);




		return container;
	}

	handleDeleteButtonClick()
	{
		if (this.deleteButtonHandler)
		{
			this.deleteButtonHandler(this);
		}
	}

	handleEditButtonClick()
	{
		if(this.editButtonHandler)
		{
			this.editButtonHandler(this);
		}
	}
}