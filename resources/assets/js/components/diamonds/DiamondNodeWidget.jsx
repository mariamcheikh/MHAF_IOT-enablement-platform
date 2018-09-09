import * as React from "react";
import { DiamondNodeModel } from "./DiamondNodeModel";
import { PortWidget } from "storm-react-diagrams";

export interface DiamonNodeWidgetProps {
    node: DiamondNodeModel;
    size?: number;
}

export interface DiamonNodeWidgetState {}

/**
 * @author Dylan Vorster
 */
export class DiamonNodeWidget extends React.Component<DiamonNodeWidgetProps, DiamonNodeWidgetState> {
   /* public static defaultProps: DiamonNodeWidgetProps = {
        size: 150,
        node: null
    };*/

    constructor(props: DiamonNodeWidgetProps) {
        super(props);
        this.state = {};
    }

    render() {
        var size = 75;
        return (
            <div
                className={"diamond-node"}
                style={{
                    position: "relative",
                    width: size,
                    height: size
                }}
            >
                <svg
                    width={size}
                    height={size}
                    dangerouslySetInnerHTML={{
                        __html:
                        `
					<g id="Layer_1">
					</g>
					<g id="Layer_2">
						<polygon fill="purple" stroke="#000000" stroke-width="3" stroke-miterlimit="10" points="10,` +
                        size / 2 +
                        ` ` +
                        size / 2 +
                        `,10 ` +
                        (size - 10) +
                        `,` +
                        size / 2 +
                        ` ` +
                        size / 2 +
                        `,` +
                        (size - 10) +
                        ` "/>
					</g>
				`
                    }}
                />
                <div
                    style={{
                        position: "absolute",
                        zIndex: 10,
                        top: size / 2 - 8,
                        left: -8
                    }}
                >
                    <PortWidget name="left" node={this.props.node} />
                    false
                </div>
                <div
                    style={{
                        position: "absolute",
                        zIndex: 10,
                        left: size / 2 - 8,
                        top: -8
                    }}
                >
                    <PortWidget name="top" node={this.props.node} />
                </div>
                <div
                    style={{
                        position: "absolute",
                        zIndex: 10,
                        left: size - 8,
                        top: size / 2 - 8
                    }}
                >
                    <PortWidget name="right" node={this.props.node} />
                    true
                </div>
                <div
                    style={{
                        position: "absolute",
                        zIndex: 10,
                        left: size / 2 - 8,
                        top: size - 8
                    }}
                >

                </div>
            </div>
        );
    }
}

export var DiamonNodeWidgetFactory = React.createFactory(DiamonNodeWidget);