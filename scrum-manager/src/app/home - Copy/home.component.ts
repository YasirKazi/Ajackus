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
    constructor() {
        this.boardList = [
            {
                title: 'To Do',
                listName: 'test',
                taskArray: [
                    {
                        title: 'test',
                        description: 'descrptiontext',
                        dateAdded: new Date().toString()
                    },
                    {
                        title: 'TEST 2',
                        description: 'descrp',
                        dateAdded: new Date().toString()
                    },
                    {
                        title: 'TEST 3',
                        description: '123',
                        dateAdded: new Date().toString()
                    }
                ]
            },
            {
                title: 'Done Already',
                listName: 'test',
                taskArray: [
                    {
                        title: 'test',
                        description: 'descrptiontext',
                        dateAdded: new Date().toString()
                    },
                    {
                        title: 'TEST 2',
                        description: 'descrp',
                        dateAdded: new Date().toString()
                    },
                    {
                        title: 'TEST 3',
                        description: '123',
                        dateAdded: new Date().toString()
                    }
                ]
            },
            {
                title: 'Halted',
                listName: 'test',
                taskArray: [
                    {
                        title: 'test',
                        description: 'descrptiontext',
                        dateAdded: new Date().toString()
                    },
                    {
                        title: 'TEST 2',
                        description: 'descrp',
                        dateAdded: new Date().toString()
                    },
                    {
                        title: 'TEST 3',
                        description: '123',
                        dateAdded: new Date().toString()
                    }
                ]
            }
        ];
    }

    // public todo: Task[] = [
    //     { title: 'Get to work', description: 'testing description', dateAdded: new Date().toString() }
    // ];

    // public done: Task[] = [
    //     { title: 'Get up', description: 'testing description', dateAdded: new Date().toString() }
    // ];

    // public cancelled: Task[] = [
    //     { title: 'Get up', description: 'testing description', dateAdded: new Date().toString() }
    // ];

    // addItem(list: string, taskName: string, taskDescription: string) {
    //     if (list === 'todo') {
    //         this.todo.push({ title: taskName, description: taskDescription, dateAdded: new Date().toString() });
    //     } else {
    //         this.done.push({ title: taskName, description: taskDescription, dateAdded: new Date().toString() });
    //     }
    // }

    drop(event: CdkDragDrop<TaskList[]>) {
        console.log(event);
        // first check if it was moved within the same list or moved to a different list
        if (event.previousContainer === event.container) {
            // change the items index if it was moved within the same list
            moveItemInArray(event.container.data, event.previousIndex, event.currentIndex);
        }
        // else {
        //     // remove item from the previous list and add it to the new array
        //     transferArrayItem(event.previousContainer.data, event.container.data, event.previousIndex, event.currentIndex);
        // }
    }
    ngOnInit() {
        console.warn(this.boardList);
    }

}
