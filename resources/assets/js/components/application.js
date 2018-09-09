import React from 'react';
import Lodash from 'lodash';

import {
    DiagramWidget,
    DiagramEngine,
    DefaultNodeFactory,
    DefaultLinkFactory,
    DiagramModel,
    DefaultNodeModel,
    DefaultPortModel,
    SimplePortFactory,
    LinkModel
} from 'storm-react-diagrams';

import { DiamondNodeModel } from "./diamonds/DiamondNodeModel";
import { DiamondNodeFactory } from "./diamonds/DiamondNodeFactory";
import { DiamondPortModel } from "./diamonds/DiamondPortModel";

import { ConditionNodeModel } from './custom/ConditionNodeModel';
import { ConditionWidgetFactory } from './custom/ConditionWidgetFactory';

import TrayWidget from './tray/TrayWidget';
import TrayItemWidget from './tray/TrayItemWidget';

import './srd.css';

class Application extends React.Component<any, any> {

    constructor(props) {
        super(props);
        this.generateCode = this.generateCode.bind(this);
    }

    componentWillMount() {
        this.engine = new DiagramEngine();

        this.engine.registerNodeFactory(new DefaultNodeFactory());
        this.engine.registerLinkFactory(new DefaultLinkFactory());
        this.engine.registerNodeFactory(new DiamondNodeFactory());
        this.engine.registerNodeFactory(new ConditionWidgetFactory());
        this.engine.registerPortFactory(new SimplePortFactory("diamond", config => new DiamondPortModel()));

        //this.state.engine = engine;

        const model = new DiagramModel();
        this.engine.setDiagramModel(model);
        //this.engine.addModel();

       /* const node1 = new DefaultNodeModel('Node 1', 'rgb(0,192,255)');
        const port1 = node1.addPort(new DefaultPortModel(false, 'out-1', 'Out'));
        node1.x = 100;
        node1.y = 100;

        const node2 = new DefaultNodeModel('Node 2', 'rgb(192,255,0)');
        const port2 = node2.addPort(new DefaultPortModel(true, 'in-1', 'IN'));
        node2.x = 400;
        node2.y = 100;

        var nodeDiamond = new DiamondNodeModel();
        nodeDiamond.x = 250;
        nodeDiamond.y = 108;

        var nodeCondition = new ConditionNodeModel();
        nodeCondition.x = 250;
        nodeCondition.y = 108;


        const link1 = new LinkModel();
        link1.setSourcePort(port1);
        link1.setTargetPort(port2);

        model.addNode(node1);
        model.addNode(node2);
        //model.addNode(nodeDiamond);
        model.addNode(nodeCondition);
        model.addLink(link1);*/
    }

    generateCode(engine)
    {
        //const { engine } = this.engine;
        //var str = JSON.stringify(engine.getDiagramModel().serializeDiagram());
        //console.log("str: " + str);

        // Create all elements
        var elementsArray = new Array();
        // Create header
        var header = new Object();
        header.id = id;
        // Add it to the elements array
        elementsArray.push(header);
        // Get the diagram model
        var model = engine.getDiagramModel();
        // Loop through nodes
        for(var nodeId in model.getNodes())
        {
            // Get the node
            var node = model.getNode(nodeId);
            // Get node position
            console.log("nd: " + node.x);
        }
        // Convert to json
        var json_text = JSON.stringify(elementsArray);

        console.log("json: " + json_text);
    }

    render() {
        return (
            <div className="content" style={{ backgroundColor: '#1A062F' }}>
                <div style={{ float: 'left', width: 20 + "%", "margin-top": 5 + "%", border: 1 + "px"}}>
                    <div>
                        <TrayWidget style={{ align: 'center'}}>
                            <TrayItemWidget model={{ type: 'condition' }} name="Condition" color="#272727" />
                            <TrayItemWidget model={{ type: 'or' }} name="OR" color="rgb(0,192,255)" />
                            <TrayItemWidget model={{ type: 'and' }} name="AND" color="rgb(0,192,255)" />
                        </TrayWidget>
                    </div>

                    <div style={{ "margin-top": 20 + "%"}}>
                        <TrayWidget style={{ align: 'center'}}>
                            <TrayItemWidget model={{ type: 'mail' }} name="Send mail" color="#272727" />
                            <TrayItemWidget model={{ type: 'sms' }} name="Send SMS" color="#272727" />
                            <TrayItemWidget model={{ type: 'writedt' }} name="Write datatype" color="#272727" />
                        </TrayWidget>
                    </div>
                </div>
                <div
                    className="diagram-layer"
                    onDrop={event => {
                        // Get the dragged item's data
                        var data = JSON.parse(event.dataTransfer.getData('storm-diagram-node'));
                        var nodesCount = Lodash.keys(this.engine.getDiagramModel().getNodes()).length;
                        var node = null;
                        // Get the mouse point
                        var points = this.engine.getRelativeMousePoint(event);
                        // Create a new node from the item's type
                        if (data.type === 'condition')
                        {
                            // Create the condition node model
                            node = new ConditionNodeModel();
                            // Add ports
                            node.addPort(new DefaultPortModel(true, 'in-1', 'In'));
                            var portOut = node.addPort(new DefaultPortModel(true, 'out-1', 'Out'));
                            // Set its position
                            node.x = points.x;
                            node.y = points.y;

                            // Create a diamond node
                            var nodeDiamond  = new DiamondNodeModel();
                            // Set its position
                            nodeDiamond.x = points.x;
                            nodeDiamond.y = points.y + 200;
                            // Get the top port
                            var portIn = nodeDiamond.getPort("top");

                            // Add a link
                            const link = new LinkModel();
                            link.setSourcePort(portOut);
                            link.setTargetPort(portIn);

                            // Add node and update the engine
                            this.engine.getDiagramModel().addNode(nodeDiamond);
                            this.engine.getDiagramModel().addLink(link);

                        }
                        else if (data.type === 'or')
                        {
                            node = new DefaultNodeModel('OR', 'rgb(0,192,255)');
                            node.addPort(new DefaultPortModel(true, 'in-1', 'In'));
                            node.addPort(new DefaultPortModel(true, 'out-1', 'Out'));
                        }
                        else if (data.type === 'and')
                        {
                            node = new DefaultNodeModel('AND', 'rgb(0,192,255)');
                            node.addPort(new DefaultPortModel(true, 'in-1', 'In'));
                            node.addPort(new DefaultPortModel(true, 'out-1', 'Out'));
                        }
                        else
                        {
                            node = new DefaultNodeModel('Action', '#00897D');
                            node.addPort(new DefaultPortModel(false, 'out-1', 'Out'));
                            node.addPort(new DefaultPortModel(false, 'in-1', 'In'));
                        }

                        // Set the node's position to the mouse point
                        node.x = points.x;
                        node.y = points.y;
                        // Add node and update the engine
                        this.engine.getDiagramModel().addNode(node);
                        // Force update
                        this.forceUpdate();
                    }}
                    onDragOver={event => {
                        event.preventDefault();
                    }}
                >
                    <button className="btn btn-primary" onClick={() => {
                        this.generateCode(this.engine);
                    }} style={{ width: 100+'px', height : 30+'px' }}>Generate</button>
                <DiagramWidget diagramEngine={this.engine} style={{ "background-color": '#1A062F' }}/>
                </div>
            </div>
        );
    }

    /*generateCode(id)
    {
        // Find all draggables
        var elements = document.getElementsByClassName("draggable");
        var elementsArray = new Array();
        var header = new Object();
        header.id = id;

        elementsArray.push(header);
        // Allow them to be dragged
        for (var i = 0; i < elements.length; i++)
        {
            // Get header
            var name = elements[i].firstElementChild.innerText;
            if(name == "Condition")
            {
                var condition_index = elements[i].querySelector("#condition").selectedIndex;
                var condition_value = elements[i].querySelector("#cond_value").value;

                var json = new Object();
                json.type = 0;
                json.condition = condition_index;
                json.value = condition_value;

                elementsArray.push(json);
            }
            else
            {
                var condition_index = elements[i].querySelector("#action").selectedIndex;

                var json = new Object();
                json.type = 1;
                json.action = condition_index;
                if(condition_index == 2)
                    json.message = elements[i].querySelector("#message").value;

                elementsArray.push(json);
            }
        }

        var json_text = JSON.stringify(elementsArray);

        alert(json_text);
        var xhr = new XMLHttpRequest();
        var url = "application_finish";
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/json");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                alert(xhr.responseText);
            }
        };
        xhr.send(json_text);
    }*/
}

export default Application;
