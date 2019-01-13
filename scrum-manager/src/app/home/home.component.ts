import { Component, OnInit } from '@angular/core';
import { CdkDragDrop, moveItemInArray, transferArrayItem } from '@angular/cdk/drag-drop';
import { TaskList } from '../task';

@Component({
    selector: 'app-home',
    templateUrl: './home.component.html',
    styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {
    boardList: TaskList[];
    connectList: any;
    archiveList: TaskList[];
    constructor() {
        this.boardList = [
            {
                title: 'To Do',
                listName: 'todoList',
                taskArray: [
                    {
                        title: 'test To Do',
                        description: 'descrptiontext',
                        dateAdded: new Date().toString()
                    },
                    {
                        title: 'TEST 2 To Do',
                        description: 'descrp',
                        dateAdded: new Date().toString()
                    },
                    {
                        title: 'TEST 3 To Do',
                        description: '123',
                        dateAdded: new Date().toString()
                    }
                ]
            },
            {
                title: 'Done Already',
                listName: 'DoneAlreadyList',
                taskArray: [
                    {
                        title: 'test Done Already',
                        description: 'descrptiontext',
                        dateAdded: new Date().toString()
                    },
                    {
                        title: 'TEST 2 Done Already',
                        description: 'descrp',
                        dateAdded: new Date().toString()
                    },
                    {
                        title: 'TEST 3 Done Already',
                        description: '123',
                        dateAdded: new Date().toString()
                    }
                ]
            },
            {
                title: 'Halted',
                listName: 'HaltedList',
                taskArray: [
                    {
                        title: 'test Halted',
                        description: 'descrptiontext',
                        dateAdded: new Date().toString()
                    },
                    {
                        title: 'TEST 2 Halted',
                        description: 'descrp',
                        dateAdded: new Date().toString()
                    },
                    {
                        title: 'TEST 3 Halted',
                        description: '123',
                        dateAdded: new Date().toString()
                    }
                ]
            }
        ];
        this.connectList = [];
        this.archiveList = [{
            title: 'Archived ',
            listName: 'archiveList',
            taskArray: []
        }];
    }

    public getConnectedLists(listArray: TaskList[]) {
        const thisObj = this;
        if (listArray) {
            for (let i = 0; i < listArray.length; i++) {
                thisObj.connectList.push(listArray[i].listName);
            }
        }
    }

    public filterListName(listArray: any, currentLisName: string) {
        if (listArray) {
            const returnArray = listArray.filter(word => word != currentLisName);
            return returnArray;
        }
    }

    addItem(listIndex: string, taskName: string, taskDescription: string) {
        if (listIndex) {
            this.boardList[listIndex].taskArray.push({ title: taskName, description: taskDescription, dateAdded: new Date().toString() });
            localStorage.setItem('boardList', JSON.stringify(this.boardList));
        }
    }

    drop(event: CdkDragDrop<TaskList[]>) {
        // first check if it was moved within the same list or moved to a different list
        if (event.previousContainer === event.container) {
            // change the items index if it was moved within the same list
            moveItemInArray(event.container.data, event.previousIndex, event.currentIndex);
        } else {
            // remove item from the previous list and add it to the new array
            transferArrayItem(event.previousContainer.data, event.container.data, event.previousIndex, event.currentIndex);
        }
    }

    archiveCard(cardIndex: any, boardListIndex: any) {
        if ((cardIndex != null) && (boardListIndex != null)) {
            this.archiveList[0].taskArray.push(this.boardList[boardListIndex].taskArray[cardIndex]);
            this.boardList[boardListIndex].taskArray.splice(cardIndex, 1);
        }
    }

    renameCard(cardIndex: any, boardListIndex: any) {
        if ((cardIndex != null) && (boardListIndex != null)) {
            this.archiveList[0].taskArray.push(this.boardList[boardListIndex].taskArray[cardIndex]);
            this.boardList[boardListIndex].taskArray.splice(cardIndex, 1);
        }
    }

    ngOnInit() {
        if (localStorage.getItem('boardList') != null) {
            this.boardList = JSON.parse(localStorage.getItem('boardList'));
        }
        this.getConnectedLists(this.boardList);
    }

}
