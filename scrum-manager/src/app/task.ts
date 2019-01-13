export interface Task {
    title: string;
    description: string;
    dateAdded: string;
}
export interface TaskList {
    title: string;
    listName: string;
    taskArray: Array<Task>;
}
